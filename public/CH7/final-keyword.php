<?php

class GeneralPurposeCalculator
{
    final public function calculatePercentage($part, $whole) :float
    {
        return ($part / $whole) * 100;
    }
}

class FinancialCalculator extends GeneralPurposeCalculator
{
    public function calculatePercentage($part, $whole): float
    {
        return $part / ($whole * 100);
    }
}

$gp_calculator= new GeneralPurposeCalculator();
echo $gp_calculator->calculatePercentage(50, 100) . "\n";

$financial_calc = new FinancialCalculator();
echo $financial_calc->calculatePercentage(50, 100) . "\n";
