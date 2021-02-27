<?php

namespace App\Helpers;

class Tokenizer 
{

	 public static function randomCollection($count)
    {	    
	    //define character libraries - remove ambiguous characters like iIl|1 0oO
	    $collections = [];
	    $collections[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
	    $collections[] = 'abcdefghjkmnpqrstuvwxyz';
	    $collections[] = '0123456789';
	    $token = '';	    
	    //append a character from each set - gets first 3 characters
	    foreach ($collections as $collection) {
	        $token .= $collection[array_rand(str_split($collection))];
	    }

	    //use all characters to fill up to $len
	    while(strlen($token) < $count) {
	        //get a random set
	        $randomCollection = $collections[array_rand($collections)];
	        
	        //add a random char from the random set
	        $token .= $randomCollection[array_rand(str_split($randomCollection))]; 
	    }
	    
	    //shuffle the password string before returning!
	    return str_shuffle($token);
	}


} 
