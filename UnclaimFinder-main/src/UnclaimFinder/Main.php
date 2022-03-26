<?php

namespace UnclaimFinder;

use pocketmine\event\Listener;
use pocketmine\scheduler\Task;
use pocketmine\block\Block;
use pocketmine\block\tile\Chest;
use pocketmine\tile\Tile;
use pocketmine\world\World;
use pocketmine\world\Position;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{
    
    public function onEnable():void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
}
    public function onUse(PlayerItemUseEvent $event){
        $player = $event->getPlayer();
        if($event->getItem()->getId() == 433){
            $c = 0;
            $chunk = $player->getWorld()->getChunk($player->getPosition()->getX() >> 4, $player->getPosition()->getZ() >> 4);
            foreach($chunk->getTiles() as $tile) $c++;
                $player->sendPopup("{$c}%%");
        }
                    }
}
