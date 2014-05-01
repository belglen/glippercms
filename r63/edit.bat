ECHO OFF
CLS

IF "%1"=="" GOTO EOF
IF "%1"=="d" GOTO DECOMPILE
IF "%1"=="c" GOTO COMPILE

:DECOMPILE
ECHO HabboUI Editor is decompiling the SWF.
ECHO Please wait......
abcexport habbo/habbo.swf
rabcdasm habbo/habbo-0.abc
rabcdasm habbo/habbo-1.abc
GOTO EOF

:COMPILE
ECHO HabboUI Editor is compiling the SWF.
ECHO Please wait......
RABCASM habbo/habbo-0/Habbo-0.main.asasm
RABCASM habbo/habbo-1/Habbo-1.main.asasm
abcreplace habbo/habbo.swf 0 habbo/habbo-0/habbo-0.main.abc
abcreplace habbo/habbo.swf 1 habbo/habbo-1/habbo-1.main.abc

GOTO EOF

:EOF