<?php

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;

class DaylightDetectorInverted extends Transparent implements Redstone{

	protected $id = self::DAYLIGHT_DETECTOR_INVERTED;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Inverted Daylight Detector";
	}

	public function isRedstone(){
		return true;
	}
	
	public function canBeActivated(){
		return true;
	}

	public function onUpdate($type){
		if($type === Level::BLOCK_UPDATE_SCHEDULED || $type === Level::BLOCK_UPDATE_NORMAL){
			$this->power=15-$this->getLightLevel();
			$this->getLevel()->scheduleUpdate($this, 300);
			$this->getLevel()->setBlock($this, $this, true, true);
			return Level::BLOCK_UPDATE_NORMAL;
		}
		return false;
	}

	public function onRedstoneUpdate($type){
		if($type === Level::BLOCK_UPDATE_SCHEDULED || $type === Level::BLOCK_UPDATE_NORMAL){
			$this->power=15-$this->getLightLevel();
			$this->getLevel()->scheduleUpdate($this, 300);
			$this->getLevel()->setBlock($this, $this, true, true);
			return Level::BLOCK_UPDATE_NORMAL;
		}
		return false;
	}

	public function onActivate(Item $item, Player $player = null){
		$this->id=self::DAYLIGHT_DETECTOR;
		$this->getLevel()->setBlock($this, $this, true, true);
	}

	public function getDrops(Item $item){
		return [[self::DAYLIGHT_DETECTOR_INVERTED,0,1]];
	}
}
