<?php 
//defined('BASEPATH') OR exit('No direct script access allowed');

/**
Library to deal with json to send, and received
@author  David di Marcantonio
@version 1.log10 
*/
class Jsonbourne
{
    /**
    Encode an array 
    @params code error 
    @params message
    @params array
    @return json encode array
    */
    public function forge($codeError, $message, $array)
    {
        if (isset($codeError))                 // if $codeError exists 
        {
            if (isset($message))               // and $message exists
            {
                if (isset($array))             // and !! youhou $array exists too! 
                {
                    return json_encode(array('error' => $codeError, 'message' => $message, 'data' => $array));
                }
                else                          // bo... $array does not exist...
                {
                    return json_encode(array('error' => $codeError, 'message' => $message));
                }

            }
            else                             // bo... $message does not exist too...
            {
                return json_encode(array('error' => $codeError));
            }
        }
        else                                // how can I be so alone!! no $codeError too!! go in hell!
        {
            return json_encode(array('error' => 3, "message" => "bad request"));
        }
    }

    /**
    Get the json data from the request body
    @return json decode array
    */
    public function decodeReqBody()
    {
       return json_decode(trim(file_get_contents('php://input')), true);
    }


}