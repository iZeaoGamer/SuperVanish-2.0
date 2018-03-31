<?php

namespace Vanish;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Main extends PluginBase implements Listener{
    
public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this,$this);
   }
public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
if($cmd->getName() == "vanish"){
if($sender instanceof Player){
if($sender->hasPermission("supervanish.spectate")){
          if(isset($args[0])){
    if($args[0] == "on"){
 $sender->setNameTagVisible(false);
 $sender->addEffect(Effect::getEffect(new Effect)(Effect::INVISIBILITY(new EffectInstance)->setDuration(99999999*20)->setAmplifier(1)->setVisible(false)));
 $event->getPlayer()->addTitle("§l§7Vanish has been", "§l§7Turned - §aON", 40, 100, 40);
 return true;
        }
   if($args[0] == "off"){
 $sender->setNameTagVisible(true);
 $sender->removeEffect(Effect::INVISIBILITY);
 $event->getPlayer()->addTitle("§l§7Vanish has been", "§l§7Turned - §aOFF", 40, 100, 40);
 return true;
       }else{
          $sender->sendMessage("§l§bVanish §8> §r§aUse /vanish <on|off>");
          return true;
     }
   }else{
    $sender->sendMessage("Please use: /vanish <on|off>");
    return true;
      }
  }else{
    $sender->sendMessage("Please use this command in game");
   return true;
   }
  }
}
return true;
        }
}
