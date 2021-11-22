<?php 
class Cache implements CacheInterface 
{
    
    private $duration=60*5;
    
    public function set(string $key, $value, int $duration) 
    {
        $this->duration = $duration;
        file_put_contents($key, $value);
        echo 'Data Read<br>';
        echo '*********************************************************<br>';
        print_r($value);
    }


    public function get(string $key) 
   {
        if (file_exists($key) && ((time() - filemtime($key)) < $this->duration)) {
            $fileContents = file_get_contents($key);
            echo 'Cached Data Read<br>';
            echo '*********************************************************<br>';
            print_r($fileContents);
        } else {
            echo 'cache expired';
            return null;
        }
        

    }

}

$file = new Cache;
if(!file_exists('result')) { // first time call check file present or not
$file->set('result',$result , 60*5);
}
elseif((time() - filemtime('result')) > 60*5) { // check previous cached exipred or not
$file->set('result',$result , 60*5);
}
else{
$file->get('result'); // retrieve cache data last 5 mins
}
