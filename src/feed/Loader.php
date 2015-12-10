<?php
namespace feed;
    
use pocketmine\plugin\PluginBase;
use feed\commands\feed;
use pocketmine\Server;


class Loader extends PluginBase{
    
    public function onEnable() {
        $this->getLogger()->notice("Loading that food sheit!");
        
        //commands
        $this->getServer()->getCommandMap()->register("feed", new feed($this));
    }                    
}
