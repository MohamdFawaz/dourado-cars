<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class APIController extends Controller
{
    const FAIL_STATUS = 0;
    const SUCCESS_STATUS = 1;
    /**
     * @var int Status Code.
     */
    protected $statusCode = 200;

    /**
     * Getter method to return stored status code.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Setter method to set status code.
     * It is returning current object
     * for chaining purposes.
     *
     * @param mixed $statusCode
     * @return current object.
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Function to return an unauthorized response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondUnauthorizedError($message = 'Unauthorized!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * Function to return forbidden error response.
     * @param string $message
     * @return mixed
     */
    public function respondForbiddenError($message = 'Forbidden!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * Function to return a Not Found response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Function to return an internal error response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * Function to return a service unavailable response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondServiceUnavailable($message = "Service Unavailable!")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_SERVICE_UNAVAILABLE)->respondWithError($message);
    }

    /**
     * Function to return a generic response.
     *
     * @param $data Data to be used in response.
     * @param array $headers Headers to b used in response.
     * @return mixed Return the response.
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondData($data, $message = "", $status = self::SUCCESS_STATUS)
    {
        return $this->respond([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function respondDataWithProperty($data, $recommendedCars, $message = "", $status = self::SUCCESS_STATUS)
    {
        return $this->respond([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'recommended_cars' => $recommendedCars
        ]);
    }

    /**
     * Function to return a generic response.
     *
     * @param $data Data to be used in response.
     * @param array $headers Headers to b used in response.
     * @return mixed Return the response.
     */
    public function respondSuccess($headers = [])
    {
        return response()->json(['status' => 'success'], $this->getStatusCode(), $headers);
    }

    /**
     * Function to return an error response.
     *
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)
            ->respond([
                'status' => self::FAIL_STATUS,
                'message' => $message,
                'data' => []
            ]);
    }

    /**
     * @param $message
     * @return mixed
     */
    protected function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)
            ->respond([
                'message' => $message
            ]);
    }

    /**
     * @param $message
     * @return mixed
     */
    protected function respondUnprocessableEntity($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->respond([
                'message' => $message
            ]);
    }

    /**
     * @param LengthAwarePaginator $paginatedEntity
     * @param string $message
     * @return mixed
     */
    protected function respondWithPagination(LengthAwarePaginator $paginatedEntity, $message = '')
    {
        $response = [
            'status' => self::SUCCESS_STATUS,
            'message' => $message,
            'total_count' => $paginatedEntity->total(),
            'pages' => $paginatedEntity->lastPage(),
            'data' => $paginatedEntity->items()
        ];
        return $this->respond($response);
    }

    /**
     * @param AnonymousResourceCollection $paginatedEntity
     * @param string $message
     * @return mixed
     */
    protected function respondWithCollectionResourcePagination(AnonymousResourceCollection $paginatedEntity, $message = '')
    {
        $response = [
            'status' => self::SUCCESS_STATUS,
            'message' => $message,
            'total_count' => $paginatedEntity->total(),
            'pages' => $paginatedEntity->lastPage(),
            'data' => $paginatedEntity->items()
        ];
        return $this->respond($response);
    }


    /**
     * @param ValidationException $validatorException
     * @return mixed
     */
    protected function respondValidationErrors(ValidationException $validatorException)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)
            ->respond([
                'status' => self::FAIL_STATUS,
                'message' => $validatorException->getMessage(),
                'data' => $validatorException->errors()
            ]);
    }


    public function curlExec($url, $method = 'GET', $data = [])
    {
        if ($method != 'GET' && $method != 'POST') {
            return $this->respondWithError('Inappropriate request method "' . $method . '"');
        }

        if (empty($url)) {
            return $this->respondWithError('URL is required.');
        }

        $response = null;
        $url = url('api/' . $url);
        $data = json_encode($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        $response = json_decode($response, true);

        if (!is_array($response)) {
            return ['error' => 'Internal error.'];
        }

        if (array_key_exists('error', $response)) {
            return $response;
        }
        if (array_key_exists('validation_errors', $response)) {
            return $response;
        }
        if (array_key_exists('status', $response)) {
            if ($response['status'] == 'success')
                return $response;
            else
                return ['error' => 'Internal error.'];
        }
        if (array_key_exists('data', $response)) {
            return $response;
        }

        return ['error' => 'Internal error.'];
    }
}
