<?php
namespace app;

class Test
{
    private string $file;
    public function __construct( $file = 'tmp.txt')
    {
        try {
            $this->file = 'files/' . $file;

            $start = 'start';
            file_put_contents($this->file, $start . PHP_EOL);

            //for example random exception
            throw new Exception('Hi, i am a good exception');

            //code below doesn't run
            $result = 'Hii, i am a nice ending';
            file_put_contents($this->file, $result . PHP_EOL, FILE_APPEND);

            $end = 'end';
            file_put_contents($this->file, $end . PHP_EOL, FILE_APPEND);


        } catch (Exception $e) {
            file_put_contents($this->file, $e->getMessage() . PHP_EOL, FILE_APPEND);
//            $end = 'end';
//            file_put_contents($this->files, $end . PHP_EOL);
        }

//        catch (ExceptionTwo $e) {
//            file_put_contents($this->files, $e->getMessage());
//            $end = 'end';
//            file_put_contents($this->files, $end . PHP_EOL);
//        }
//        catch (ExceptionThree $e) {
//            file_put_contents($this->files, $e->getMessage());
//            $end = 'end';
//            file_put_contents($this->files, $end . PHP_EOL);
//        }.......

        //finally in this case is best practice, Because duplication of code is bad idea
        finally {
            $end = 'end';
            file_put_contents($this->file, $end . PHP_EOL, FILE_APPEND);
        }
    }
}

$a = new Test('good');



