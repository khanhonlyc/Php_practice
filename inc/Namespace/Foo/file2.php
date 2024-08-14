<?php
namespace Foo\Bar;
include 'file1.php';
const FOO = 2;
function foo() {
    echo "foo_file_2";
}
class foo
{
    static function staticmethod() {
        echo "staticmethod_2";
    }
}

/* Unqualified name */
// foo(); // resolves to function Foo\Bar\foo
// foo::staticmethod(); // resolves to class Foo\Bar\foo, method staticmethod
// echo FOO; // resolves to constant Foo\Bar\FOO

/* Qualified name */
// subnamespace\foo(); // resolves to function Foo\Bar\subnamespace\foo
// subnamespace\foo::staticmethod(); // resolves to class Foo\Bar\subnamespace\foo,
//                                   // method staticmethod
// echo subnamespace\FOO; // resolves to constant Foo\Bar\subnamespace\FOO
                                  
/* Fully qualified name */
// \Foo\Bar\foo(); // resolves to function Foo\Bar\foo
// \Foo\Bar\foo::staticmethod(); // resolves to class Foo\Bar\foo, method staticmethod
// echo \Foo\Bar\FOO; // resolves to constant Foo\Bar\FOO

echo subnamespace\foo::staticmethod();