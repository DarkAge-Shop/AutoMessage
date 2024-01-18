<?php

namespace Msg;

use Msg\Task\TaskMsg;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase
{

    private static Main $instance;
    private static Config $config;

    public function onEnable(): void
    {
        $this->getLogger()->notice("Plugin à bien démarrer !");
        $this->getLogger()->notice("by HyrPikk");

        $this->saveDefaultConfig();
        self::$config = new Config(Main::GetInstance()->getDataFolder()."config.yml",Config::YAML);
        $this->getScheduler()->scheduleDelayedRepeatingTask(new TaskMsg(),20*10,intval(Main::GetConfigYML()->get("period")*20));
    }

    public function onDisable(): void
    {
        $this->getLogger()->notice("Plugin à bien été Stopper !");
        $this->getLogger()->notice("by HyrPikk");
    }

    public static function GetInstance():Main{
        return self::$instance;
    }
    public static function GetConfigYML():Config{
        return self::$config;
    }

}