<?php

namespace unerds\xyz;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;


class xyz extends PluginBase {

    public function onEnable(){
        $this->getLogger()->info("/xyz enabled.");
        return true;
    }


    public function onLoad(){
        $this->getLogger()->info("/xyz loaded");
    }


    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        switch($command->getName()){
            case "xyz":
                if($sender instanceof Player){
                    $playerX = $sender->getX();
                    $playerY = $sender->getY();
                    $playerZ = $sender->getZ();

                    $outX=round($playerX,1);
                    $outY=round($playerY,1);
                    $outZ=round($playerZ,1);

                    $playerLevel = $sender->getLevel()->getName();

                    $sender->sendMessage("x:" . $outX . ", y:" . $outY . ", z:" . $outZ . ". On: " . $playerLevel);
                    return true;
                }

                else{
                    $sender->sendMessage("This command only works in-game.");
                }
                return true;
        }
        return true;
    }


    public function onDisable(){
        $this->getLogger()->info("/xyz disabled.");
        return true;
    }
}