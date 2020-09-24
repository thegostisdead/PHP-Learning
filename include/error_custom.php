<?php

/*
 * Class to create and manage errors.
 * error_custom Object for useful usages.
 */

class error_custom
{


    private $type;
    private $content;


    /**
     * error_custom constructor.
     * @param $type
     * @param $content
     */
    public function __construct($type, $content)
    {
        $this->type = (string) $type;
        $this->content = (string) $content;
    }

    /**
     * static function for non error object
     * @param $type
     * @param $content
     */
    public static function displayError(string $type, string $content)
    {
        if ($type == "DEBUG") {

            echo "
            <div class=\"row\">
            <div class=\"col s12 m5\">
              <div class=\"card-panel red\">
                <span class=\"white-text\">Error : " . $type .
                $content . "
                </span>
              </div>
            </div>
          </div>";

        } else if ($type == "LOG") {
            // TODO implement more error type

        }
    }

    public function get_type_custom(): string
    {

        return $this->type;
    }

    public function get_content(): string
    {
        return $this->content;
    }


}

    