<?php
interface WorkerInterface
{
    public function work();
    public function sleep();
}
class Worker implements WorkerInterface
{
    public function work()
    {
        echo "I'm working";
    }
    public function sleep()
    {
        echo "I'm sleeping";
    }
}

class Android implements WorkerInterface{
    public function work()
    {
        echo "I'm working";
    }
    public function sleep()
    {
        return null; // violace ISP princible
    }
}
class Captain
{
    public function hire(Worker $worker)
    {
        $worker->work();
        $worker->sleep();
    }
}
