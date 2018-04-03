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
if($cmd->getName() == "supervanish"){
if($sender instanceof Player){
if($sender->hasPermission("supervanish.spectate")){
          if(isset($args[0])){
    if($args[0] == "on"){
 $sender->setNameTagVisible(false);
 $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), (99999999*20), (1), (false)));
 $sender->getPlayer()->addActionBarMessage("§dSupervanish has been turned on. \n§cNo one can see you.");
 $sender->sendMessage("§7[§aSuper§6Vanish§7] §dVanish mode has been enabled. §5No one can see you. :)");
 $sender->getPlayer()->addTitle("§l§7Vanish has been", "§l§7Turned - §aON", 1000, 100000, 10000);
 return true;
        }
   if($args[0] == "off"){
 $sender->setNameTagVisible(true);
 $sender->removeEffect(Effect::INVISIBILITY);
 $sender->getPlayer()->addTitle("§l§7Vanish has been", "§l§7Turned - §aOFF", 40, 100, 40);
 $sender->getPlayer()->removeTitles(true);
 $sender->getPlayer()->addActionBarMessage("§dSupervanish has been turned off. \n§bEveryone can see you now.");
 $sender->sendMessage("§dSuperVanish has been turned off. §bEveryone can see you.");
 return true;
     }
   }else{
    $sender->sendMessage("§aPlease use: §b/$cmd <on|off> §6to turn on / off vanish.\n§aYou can also use: §b/$cmd about §6to see information about this plugin.");
    return true;
           }
    if($args[0] == "about"){
  $sender->sendMessage("§5Plugin name: §dSuperVanishV2");
  $sender->sendMessage("§aThis plugin was originally made by §bCirgio.");
  $sender->sendMessage("§bThis plugin was updated by §cVMPE Development Team");
  $sender->sendMessage("§cDescription: §dThis plugin was based off from Supervanish V1, which got outdated, and some bugs did occurr with it.\n§dThis is Supervanish V2 / 2.0");
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
