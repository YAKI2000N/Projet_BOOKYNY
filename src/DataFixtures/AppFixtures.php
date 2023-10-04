<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Books;
use App\Entity\MyBooks;
use App\Entity\Member;

class AppFixtures extends Fixture
{
    // defines reference names for instances of MyBooks
    private const BIB_PRINC = 'bibliothéque princiaple';
    private const SECT_DEVP_PER = 'section-de-developpement-personnel';
    private const SECT_SF = 'section-science-fiction';
    private const PSYCH = 'section-psychologie';
    private const POLITIQUE = 'section-politique';
  

    /**
     * Generates initialization data for MyBooks : [name_INV]
     * @return \Generator
     */
    private static function myBooksDataGenerator()
    {
        yield [self::BIB_PRINC];
        yield [self::SECT_DEVP_PER];
        yield [self::SECT_SF];
        yield [self::PSYCH];
        yield [self::POLITIQUE];
    }

    /**
     * Generates initialization data for Books:
     *  [myBooksReference, title, author]
     * @return \Generator
     */
    private static function booksGenerator()
    {
        yield [self::BIB_PRINC, "La fougere et le Bambou", "Marie Tibi"];
        yield [self::SECT_DEVP_PER, "L'homme qui voulait etre heureux", "Laurent Gounelle"];
        yield [self::SECT_DEVP_PER, "Le jour ou j'ai appris à vivre", "Laurent Gounelle"];
        yield [self::SECT_SF, "L'ultime secret", "Bernard Werber"];
        yield [self::SECT_SF, "Le mirroir de cassandre", "Bernard Werber"];
        yield [self::SECT_SF, "1984", "George Orwell "];
        yield [self::PSYCH, "L'inconscient", "Freud"];
        yield [self::POLITIQUE, "L'emprise", "Marc Dugain"];
    }

    public function load(ObjectManager $manager)
    {
        $myBooksRepo = $manager->getRepository(MyBooks::class);
        $member = new Member();
        $member->setName('John Doe');
        $manager->persist($member);
        $manager->flush();

        foreach (self::myBooksDataGenerator() as [$name_INV]) {
            $myBooks = new MyBooks();
            $myBooks->setNameINV($name_INV);
            $manager->persist($myBooks);
            $myBooks->setMember($member); 
            $manager->flush();
            $this->addReference($name_INV, $myBooks);
        }

        foreach (self::booksGenerator() as [$myBooksReference, $title, $author]) {
            // Retrieve the One-side instance of MyBooks from its reference name
            $myBooks = $this->getReference($myBooksReference);
            $book = new Books();
            $book->setTitle($title);
            $book->setAuthor($author);
            $book->setMyBooks($myBooks);

            // Add the Many-side Book to its containing MyBooks
            $myBooks->addBook($book);

            // Require that the ORM\OneToMany attribute on MyBooks::books has "cascade: ['persist']"
            $manager->persist($book);
        }
        $manager->flush();
    }
}
