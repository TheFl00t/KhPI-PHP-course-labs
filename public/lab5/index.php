<?php

// Додаткові класи винятків
class InsufficientFundsException extends Exception {}
class InvalidAmountException extends Exception {}
class InvalidInterestRateException extends Exception {}

interface AccountInterface
{
    function deposit($amount);
    function withdraw($amount);
    function getBalance();
}

class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0;
    private $balance;
    public $currency;

    public function __construct($balance, $currency)
    {
        // Перевірка на некоректну суму
        if ($balance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути менше нуля!");
        }
        $this->balance = $balance;

        $this->currency = preg_replace("/[^A-Z]/", "", strtoupper($currency));
    }

    // Реалізація методів інтерфейсу
    function deposit($amount)
    {
        // Перевірка на некоректну суму
        if ($amount <= self::MIN_BALANCE) {
            throw new InvalidAmountException("Сума має бути більше нуля!");
        }

        $this->balance += $amount;
        return (float) $amount;
    }

    function withdraw($amount)
    {
        // Перевірка на некоректну суму
        if ($amount <= self::MIN_BALANCE) {
            throw new InvalidAmountException("Сума має бути більше нуля!");
        }

        // Перевірка на достатність коштів
        if ($amount > $this->balance) {
            throw new InsufficientFundsException("Недостатньо коштів.");
        }

        $this->balance -= $amount;
        return (float) $amount;
    }

    function getBalance()
    {
        return (float) $this->balance;
    }


}

class SavingsAccount extends BankAccount
{
    public static $interestRate = 0.0;

    function applyInterest()
    {
        // Перевірка на від'ємність процентної ставки
        if (SavingsAccount::$interestRate < 0) {
            throw new InvalidInterestRateException("Процентна ставка має бути більше нуля!");
        }

        return $this->deposit($this->getBalance() * self::$interestRate);
    }
}

/*
 * =====================
 *      Тестування
 * =====================
*/

function printTestHeader($text) {
    echo "<hr><h3>" . htmlspecialchars($text) . "</h3>";
}

// 1. Тест звичайного рахунку (успішні операції)
printTestHeader("1. Тест звичайного рахунку (успішні операції)");
try {
    $acc = new BankAccount(200, "USD");
    echo "Створено рахунок: {$acc->getBalance()} {$acc->currency}<br>";

    $acc->deposit(100);
    echo "Поповнено на 100. Баланс: {$acc->getBalance()}<br>";

    $acc->withdraw(50);
    echo "Знято 50. Баланс: {$acc->getBalance()}<br>";

} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}

// 2. Тест обробки винятків (недостатньо коштів)
printTestHeader("2. Тест обробки винятків (недостатньо коштів)");
try {
    $acc = new BankAccount(50, "UAH");
    echo "Баланс: 50. Спроба зняти 100...<br>";
    $acc->withdraw(100);

} catch (InsufficientFundsException $e) {
    echo "<span style='color:red'>Помилка: " . $e->getMessage() . "</span>";

} catch (Exception $e) {
    echo "<span style='color:red'>Помилка: " . $e->getMessage();
}

// 3. Тест валідації (негативна сума)
printTestHeader("3. Тест валідації (негативна сума)");
try {
    $acc = new BankAccount(100, "EUR");
    echo "Спроба поповнити на -50...<br>";
    $acc->deposit(-50);

} catch (InvalidAmountException $e) {
    echo "<span style='color:red'>Помилка: " . $e->getMessage() . "</span>";
}

// 4. Тест накопичувального рахунку (SavingsAccount)
printTestHeader("4. Тест накопичувального рахунку (SavingsAccount)");
try {
    $saveAcc = new SavingsAccount(1000, "UAH");

    SavingsAccount::$interestRate = 0.03;
    // SavingsAccount::$interestRate = -0.05;

    echo "Депозитний рахунок: {$saveAcc->getBalance()} {$saveAcc->currency}<br>";
    echo "Відсоткова ставка: " . (SavingsAccount::$interestRate * 100) . "%<br>";

    $added = $saveAcc->applyInterest();
    echo "Нараховано відсотки: +{$added}. Новий баланс: {$saveAcc->getBalance()}";

} catch (Exception $e) {
    echo "<span style='color:red'>Помилка: " . $e->getMessage();
}

?>
