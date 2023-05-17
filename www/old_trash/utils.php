<?php

function get_random_name(){
    return time().'_'.rand(1000, 9999);
}