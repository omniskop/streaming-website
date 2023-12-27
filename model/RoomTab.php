<?php

class RoomTab
{
	public $room;
	public $tab;

	public function __construct(Room $room, $tab)
	{
		$this->room = $room;
		$this->tab = $tab;
	}

	public function getRoom()
	{
		return $this->room;
	}

	public function getTab()
	{
		return $this->tab;
	}

	public function getLink()
	{
		$path = [$this->getRoom()->getConference()->getSlug(), $this->getRoom()->getSlug()];

		$tabs = $this->getRoom()->getTabNames();
		if($tabs[0] != $this->getTab())
			$path[] = $this->getTab();

		return joinpath($path).url_params();
	}

	public function getDisplay()
	{
		$tab = $this->getTab();
		switch($tab)
		{
			case 'music':
				return 'Radio';

			case 'video':
				return 'Video (Legacy)';

			case 'slides':
				return 'Slides (Legacy)';

			case 'dash':
				return 'Video';

			default:
				return ucfirst($tab);
		}
	}
}
