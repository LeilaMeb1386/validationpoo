<?php
    class flowers
    {
        public $path;
        public $uri;
        public $head = "./views/layouts/head.html";
        public $foot = "./views/layouts/foot.html";

        public function __construct($uri)
    {
      $this->uri = $uri;
      $this->path = "./views" . $uri . ".html";
    }

        public function createFlowers()
        {

            $Flowers = array_diff(scandir('./views'),[
                ".",
                "..",
                "_404.html",
                "layouts",

            ]);

            $renderHtml = "<div>";
            sort($Flowers);

            foreach ($Flowers as $key => $value)
            {
                $renderHtml .=  "<div>" . file_get_contents("./views/" . $value ) . "</div>";
            }
            $renderHtml .= "</div>";
            return $renderHtml;
        }

        public function renderView()
        {
          if(file_exists($this->path)){
          $Flowers = file_get_contents($this->path);
          } elseif ($this->uri == "/" || $this->uri == ""){
            $Flowers = $this->createFlowers();
          } else {
              $Flowers = file_get_contents("./views/_404.html");
          }


          echo file_get_contents($this->head) . $Flowers . file_get_contents($this->foot);
        }
    }
