<?php
namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class WoodStairs extends Stair{

	protected $id = self::WOOD_STAIRS;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Wood Stairs";
	}

	public function getToolType(){
		return Tool::TYPE_AXE;
	}

        public function isBreakable(Item $item){
        $this->getLevel()->setBlock($this, new Air(), true, true);
                return true;
        }

	public function getDrops(Item $item){
		return [
			[$this->id, 0, 1],
		];
	}

	public function getHardness(){
		return 2;
	}
}
