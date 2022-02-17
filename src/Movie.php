<?php

namespace Tudublin;

class Movie
{
    private int $id;
    private string $title;
    private string $category;
    private float $price;
    private int $voteTotal = 0;
    private int $numVotes = 0;

    /**
     * integer average vote percentage (0..100)
     */
    public function getVoteAverage(): int
    {
        // avoid divide by zero problem ...
        if($this->numVotes < 1){
            return 0;
        }
        return intval($this->voteTotal / $this->numVotes);
    }

    public function getStarImage(): string
    {
        if($this->getVoteAverage() > 85){
            return 'stars5.png';
        }
        if($this->getVoteAverage() > 70){
            return 'stars4.png';
        }
        if($this->getVoteAverage() >= 50){
            return 'stars3.png';
        }
        if($this->getVoteAverage() > 40){
            return 'stars2.png';
        }
        if($this->getVoteAverage() > 15){
            return 'stars1.png';
        }

        // if get here, less than 16%, so a half-star
        return 'starsHalf.png';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getVoteTotal(): int
    {
        return $this->voteTotal;
    }

    public function setVoteTotal(int $voteTotal): void
    {
        $this->voteTotal = $voteTotal;
    }

    public function getNumVotes(): int
    {
        return $this->numVotes;
    }

    public function setNumVotes(int $numVotes): void
    {
        $this->numVotes = $numVotes;
    }
}