<?php
/**
     * Change a db array into a PHP array
     * @param $arr String representing the DB array
     * @return A PHP array
     */
    function getPgArray($dbarr) {
        // Take off the first and last characters (the braces)
        $arr = substr($dbarr, 1, strlen($dbarr) - 2);

        // Pick out array entries by carefully parsing.  This is necessary in order
        // to cope with double quotes and commas, etc.
        $elements = array();
        $i = $j = 0;        
        $in_quotes = false;
        while ($i < strlen($arr)) {
            // If current char is a double quote and it's not escaped, then
            // enter quoted bit
            $char = substr($arr, $i, 1);
            if ($char == '"' && ($i == 0 || substr($arr, $i - 1, 1) != '\\')) 
                $in_quotes = !$in_quotes;
            elseif ($char == ',' && !$in_quotes) {
                // Add text so far to the array
                $elements[] = substr($arr, $j, $i - $j);
                $j = $i + 1;
            }
            $i++;
        }
        // Add final text to the array
        $elements[] = substr($arr, $j);

        // Do one further loop over the elements array to remote double quoting
        // and escaping of double quotes and backslashes
        for ($i = 0; $i < sizeof($elements); $i++) {
            $v = $elements[$i];
            if (strpos($v, '"') === 0) {
                $v = substr($v, 1, strlen($v) - 2);
                $v = str_replace('\\"', '"', $v);
                $v = str_replace('\\\\', '\\', $v);
                $elements[$i] = $v;
            }
        }

        return $elements;
    }

    function toPgArray($set) {
    	settype($set, 'array'); // can be called with a scalar or array
    	$result = array();
    	foreach ($set as $t) {
    		if (is_array($t)) {
    			$result[] = to_pg_array($t);
    		} else {
    			$t = str_replace('"', '\\"', $t); // escape double quote
    			if (! is_numeric($t)) // quote only non-numeric values
    				$t = '"' . $t . '"';
    			$result[] = $t;
    		}
    	}
    	return '{' . implode(",", $result) . '}'; // format
    }

?>