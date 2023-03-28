<?php

interface WorkerdInterface
{
    public function work();
}
interface SleeperInterface
{
    public function sleep();
}

interface MenageInterface
{
    public function beMenage();
}

class Worker implements WorkerdInterface, SleeperInterface, MenageInterface
{
    public function work()
    {
        echo "I'm working";
    }
    public function sleep()
    {
        echo "I'm sleeping";
    }
    public function beMenage()
    {
        $this->work();
        $this->sleep();
    }
}

class Android implements WorkerdInterface
{
    public function work()
    {
        echo "I'm working";
    }
    public function beMenage()
    {
        $this->work();
    }
}

class GoodCaptain
{
    public function menage(MenageInterface $worker)
    {
        $worker->beMenage();
    }
}
