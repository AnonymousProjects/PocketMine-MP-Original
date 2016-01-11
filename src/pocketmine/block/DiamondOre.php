<?php

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;

class DiamondOre extends Solid{

	protected $id = self::DIAMOND_ORE;

	public function __construct(){

	}

	public function getHardness(){
		return 3;
	}

	public function getName(){
		return "Diamond Ore";
	}

	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	public function getDrops(Item $item){
		if($item->isPickaxe() >= Tool::TIER_IRON){
			return [
				[Item::DIAMOND, 0, 1],
			];
		}else{
			return [];
		}
	}
}