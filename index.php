<?php

class Worker
{
    private $name;
    private $age;
    private $salary;

    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->setAge($age);
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setAge($newAge)
    {
        if ($this->checkAge($newAge)) {
            $this->age = $newAge;
        } else {
            echo " Вам работать в нашей компании еще рано (указан возраст: $newAge)<br>";
        }
    }

    public function setSalary($newSalary)
    {
        $this->salary = $newSalary;
    }

    private function checkAge($age)
    {
        return $age >= 18;
    }

    public static function getTotalSalary(array $workers)
    {
        $total = 0;
        foreach ($workers as $worker) {
            $total += $worker->getSalary();
        }
        return $total;
    }
    public static function getTotalAge(array $workers)
    {
        $total = 0;
        foreach ($workers as $worker) {
            $total += $worker->getAge();
        }
        return $total;
    }
}

$worker1 = new Worker("Анна Петрова", 25, 75000);
$worker2 = new Worker("Иван Сидоров", 32, 95000);

$workers = [$worker1, $worker2];
foreach ($workers as $index => $worker) {
    echo "Работник #" . ($index + 1) . ":<br>";
    echo "  • Имя: " . $worker->getName() . "<br>";
    echo "  • Возраст: " . $worker->getAge() . " лет<br>";
    echo "  • Зарплата: " . $worker->getSalary() . " руб.<br><br>";
}


echo "Сумма зарплат: " . Worker::getTotalSalary($workers) . " руб."."<br>";
echo "Сумма возрастов: " . Worker::getTotalAge($workers) . " лет"."<br>";

echo "Попытка установить возраст 16 для Анны:<br>";
$worker1->setAge(16);
echo "Текущий возраст Анны: " . $worker1->getAge() . " лет<br><br>";

echo "Попытка установить возраст 28 для Анны:<br>";
$worker1->setAge(28);
echo "Текущий возраст Анны: " . $worker1->getAge() . " лет<br><br>";

$worker2->setSalary(110000);
echo "Зарплата Ивана обновлена: " . $worker2->getSalary() . " руб.<br>";
echo "Новая сумма зарплат: " . Worker::getTotalSalary($workers) . " руб.<br>";
?>
