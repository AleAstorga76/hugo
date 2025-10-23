<?php
// src/Entity/Product.php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[Vich\Uploadable]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    // SOLO campos individuales de precios - ELIMINA cualquier campo 'price' o 'prices'
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price4 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price8 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price16 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price20 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price32 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price36 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price40 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price48 = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price50 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    // Getters y Setters para TODOS los campos...
    public function getId(): ?int { return $this->id; }
    public function getName(): ?string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): self { $this->description = $description; return $this; }
    public function getCategory(): ?string { return $this->category; }
    public function setCategory(string $category): self { $this->category = $category; return $this; }

    // Getters y Setters para precios individuales
    public function getPrice4(): ?string { return $this->price4; }
    public function setPrice4(?string $price4): self { $this->price4 = $price4; return $this; }
    
    public function getPrice8(): ?string { return $this->price8; }
    public function setPrice8(?string $price8): self { $this->price8 = $price8; return $this; }
    
    public function getPrice16(): ?string { return $this->price16; }
    public function setPrice16(?string $price16): self { $this->price16 = $price16; return $this; }
    
    public function getPrice20(): ?string { return $this->price20; }
    public function setPrice20(?string $price20): self { $this->price20 = $price20; return $this; }
    
    public function getPrice32(): ?string { return $this->price32; }
    public function setPrice32(?string $price32): self { $this->price32 = $price32; return $this; }
    
    public function getPrice36(): ?string { return $this->price36; }
    public function setPrice36(?string $price36): self { $this->price36 = $price36; return $this; }
    
    public function getPrice40(): ?string { return $this->price40; }
    public function setPrice40(?string $price40): self { $this->price40 = $price40; return $this; }
    
    public function getPrice48(): ?string { return $this->price48; }
    public function setPrice48(?string $price48): self { $this->price48 = $price48; return $this; }
    
    public function getPrice50(): ?string { return $this->price50; }
    public function setPrice50(?string $price50): self { $this->price50 = $price50; return $this; }

    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): self { $this->image = $image; return $this; }
    
    public function setImageFile(?File $imageFile = null): void {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    
    public function getImageFile(): ?File { return $this->imageFile; }
    public function getUpdatedAt(): ?\DateTimeImmutable { return $this->updatedAt; }
    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self { $this->updatedAt = $updatedAt; return $this; }

    public function __toString(): string {
        return $this->name ?? 'Nuevo Producto';
    }

    // Método helper para obtener precios disponibles
    public function getAvailablePrices(): array
    {
        $prices = [];
        $quantities = [4, 8, 16, 20, 32, 36, 40, 48, 50];
        
        foreach ($quantities as $quantity) {
            $method = 'getPrice' . $quantity;
            $price = $this->$method();
            if ($price !== null) {
                $prices[$quantity] = $price;
            }
        }
        
        return $prices;
    }
}