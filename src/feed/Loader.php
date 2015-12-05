<?php
namespace feed;
    
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\entity\Attribute;  
use pocketmine\entity\AttributeManager;



class Loader extends PluginBase{
    
    public function onEnable() {
        $this->getLogger()->notice("Loading that food sheit!");
    }       

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        if(strtolower($command->getName()) === "feed"){
            if ($sender instanceof Player) {
                $sender->setFood(20);
                $sender->sendMessage("Yo mama fed ur face!");
                return true;
            } else { $sender->sendMessage("Nah not gonna feed that console"); return true; }
        } 

        return false;
    }             
}
    
