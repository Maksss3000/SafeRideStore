<?php

namespace application\components;

class Order
{
	protected $orderId;
	protected $userName;
	protected $orderStatus;
	protected $paymentStatus;
	protected $totalAmount;
	protected $orderDate;
	protected $txnId;
	public function getOrderId()
	{
		return $this->orderId;
	}

	public function setOrderId($orderId)
	{
		$this->orderId = $orderId;
	}

	public function getUserName()
	{
		return $this->userName;
	}

	public function setUserName($userName)
	{
		$this->userName = $userName;
	}

	public function getOrderStatus()
	{
		return $this->orderStatus;
	}

	public function setOrderStatus($orderStatus)
	{
		$this->orderStatus = $orderStatus;
	}

	public function getPaymentStatus()
	{
		return $this->paymentStatus;
	}

	public function setPaymentStatus($paymentStatus)
	{
		$this->paymentStatus = $paymentStatus;
	}

	public function getTotalAmount()
	{
		return $this->totalAmount;
	}

	public function setTotalAmount($totalAmount)
	{
		$this->totalAmount = $totalAmount;
	}

	public function getOrderDate()
	{
		return $this->orderDate;
	}

	public function setOrderDate($orderDate)
	{
		$this->orderDate = $orderDate;
	}

	public function getTxnId()
	{
		return $this->txnId;
	}

	public function setTxnId($txnId)
	{
		$this->txnId = $txnId;
	}
}
