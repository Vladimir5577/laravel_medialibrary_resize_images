<?php

    class Person {
        private $name = 'Bob';

        public function getName () {
            return "Jack";
        }
    }

    class Worker {
        public function programmer () : bool {
            return true;
        }
    }


    $worker = new Worker();
    print_r($worker->programmer());







?>
