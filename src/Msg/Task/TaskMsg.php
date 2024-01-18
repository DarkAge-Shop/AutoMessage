<?php

namespace Msg\Task;

use Msg\Main;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class TaskMsg extends Task
{

    public function onRun(): void
    {
        Server::getInstance()->broadcastMessage(Main::GetConfigYML()->get("Message"));
    }

}