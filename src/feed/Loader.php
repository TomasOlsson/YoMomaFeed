<?php
namespace feed;
    
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;


class Loader extends PluginBase{
    
    public function onEnable() {
        $this->getLogger()->notice("Loading that food sheit!");
    }       

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "feed"){
            if ($sender instanceof Player) {
                if (count($args) != 0) {
                    $name = $args[0];
                    $player = $this->getServer()->getPlayer($name);
                    if($player instanceof Player){
                        if ($sender->hasPermission("feedme.other")) { 
                           $sender->sendMessage("Yo mama fed ".$name." face!");
                           $player->setFood(20);
                           $player->sendMessage("Yo mama fed ur face!");
                            return true;
                        }  
                    }else{ $sender->sendMessage("That player ain't online!"); }
                } else {
                    $sender->setFood(20);
                    $sender->sendMessage("Yo mama fed ur face!");
                    return true;   
                }
            } else { $sender->sendMessage("Nah not gonna feed that console"); return true; }
        } 
        return false;
    }             
}
    
