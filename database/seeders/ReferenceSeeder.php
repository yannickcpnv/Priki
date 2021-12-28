<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;

class ReferenceSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reference::insert([
                              ['description' => 'Martin Fowler', 'url' => 'https://martinfowler.com/bliki/Yagni.html'],
                              [
                                  'description' => 'Agile programming misconceptions',
                                  'url'         => 'https://opensource.com/life/16/1/lightning-talk-common-misconceptions-agile-and-open-source',
                              ],
                              [
                                  'description' => 'Extreme Programming Explained',
                                  'url'         => 'https://www.amazon.com/Extreme-Programming-Explained-Embrace-Change/dp/0321278658/ref=as_li_ss_tl?ie=UTF8&qid=1493658091&sr=8-1&keywords=extreme+programming+explained&linkCode=sl1&tag=voidspace-20&linkId=2fb4e052071a43c337af9a809b64d8f9',
                              ],
                              [
                                  'description' => 'Test Driven Development by Example',
                                  'url'         => 'https://www.amazon.com/Test-Driven-Development-Kent-Beck/dp/0321146530/ref=as_li_ss_tl?s=books&ie=UTF8&qid=1493658724&sr=1-1&keywords=kent+beck+test+driven+development+by+example&linkCode=sl1&tag=voidspace-20&linkId=2a938b01e7e04c54081b268e0e2d8000',
                              ],
                              [
                                  'description' => 'The Practice of Programming',
                                  'url'         => 'https://www.amazon.com/Practice-Programming-Addison-Wesley-Professional-Computing/dp/020161586X',
                              ],
                              [
                                  'description' => 'Inversion of Control Containers and the Dependency Injection Pattern',
                                  'url'         => 'https://www.martinfowler.com/articles/injection.html',
                              ],
                              [
                                  'description' => 'Working Effectively with Legacy Code',
                                  'url'         => 'https://www.amazon.com/Working-Effectively-Legacy-Michael-Feathers/dp/0131177052/ref=as_li_ss_tl?ie=UTF8&qid=1493658398&sr=8-1&keywords=michael+feathers+legacy&linkCode=sl1&tag=voidspace-20&linkId=3503b813daa7be6480e5deaf7bc13001',
                              ],
                              [
                                  'description' => 'Fast Test, Slow Test',
                                  'url'         => 'http://pyvideo.org/pycon-us-2012/fast-test-slow-test.html',
                              ],
                              [
                                  'description' => 'Generator Tricks for Systems Programmers',
                                  'url'         => 'http://www.dabeaz.com/generators/',
                              ],
                              [
                                  'description' => 'Clean Architecture: A Craftsman’s Guide to Software Structure and Design',
                                  'url'         => 'https://www.amazon.com/Clean-Architecture-Craftsmans-Software-Structure/dp/0134494164/ref=as_li_ss_tl?ie=UTF8&qid=1493658498&sr=8-1&keywords=robert+martin&linkCode=sl1&tag=voidspace-20&linkId=07ecde89d6b4510568a46b1c96315fdd',
                              ],
                              [
                                  'description' => 'Design Patterns',
                                  'url'         => 'https://www.amazon.com/Design-Patterns-Elements-Reusable-Object-Oriented/dp/0201633612/ref=as_li_ss_tl?_encoding=UTF8&pd_rd_i=0201633612&pd_rd_r=R0KKHK5BS1EG74D6AJZE&pd_rd_w=wo6aA&pd_rd_wg=Jk1Kr&psc=1&refRID=R0KKHK5BS1EG74D6AJZE&linkCode=sl1&tag=voidspace-20&linkId=66702a01a9bc3489adf67380a1b7df97',
                              ],
                              ['description' => 'Ansible', 'url' => 'https://www.ansible.com/'],
                              ['description' => 'Wayne Witzel', 'url' => 'https://twitter.com/wwitzel3'],
                              [
                                  'description' => 'Teaching an elephant to dance',
                                  'url'         => 'https://www.redhat.com/en/engage/teaching-an-elephant-to-dance-20180131?intcmp=7016000000127cYAAQ',
                              ],
                          ]);
    }
}
