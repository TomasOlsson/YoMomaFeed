<?php
namespace feed;
    
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;


class Loader extends PluginBase{
    
    public function onEnable() {
        $this->getLogger()->notice("Loading that food sheit!");
    }       

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "feed"){
            if ($sender instanceof Player) {
                if (count($args) != 0) {
                    if ($sender->hasPermission("feedme.other")) {
                        $name = $args[0];
                        $player = $this->getServer()->getPlayer($name);
                        if($player instanceof Player){ 
                            // Send some pointless messeges
                           $sender->sendMessage(TextFormat::BLUE . "Yo mama fed ".$name." face!");
                           $player->sendMessage(TextFormat::BLUE . $sender->getName()." mama fed ur face!");
                           // set food to 20
                           $player->setFood(20);
                            return true;
                        } else{ $sender->sendMessage(TextFormat::BLUE . "Player ain't online!"); return true; }  
                    } else { $sender->sendMessage(TextFormat::DARK_RED . "Ain't nobody got that permissions!"); return true; }
                } else { // If args is missing set your own food to 20
                    $sender->sendMessage(TextFormat::BLUE . "Yo mama fed ur face!");
                    $sender->setFood(20);
                    return true;   
                }
            } else { $sender->sendMessage(TextFormat::DARK_RED . "Nah not gonna feed that console"); return true; }
        } 
        return false;
    }             
}
