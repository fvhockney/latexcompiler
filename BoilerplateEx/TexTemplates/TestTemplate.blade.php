\documentclass[fontsize=12pt]{scrlttr2}
\usepackage[english]{babel}

\KOMAoptions{
foldmarks=true,
fromalign=center,
parskip=half,
fromrule=afteraddress,
fromphone,
fromemail%
}

\setkomavar{fromname}{%
  {{$data['from']}}%
}
\setkomavar{fromaddress}{%
{{$data['fromStreet']}}\\
{{$data['fromCity']}}, {{$data['fromState']}} {{$data['fromZip']}}%
}
\setkomavar{fromphone}{%
  {{$data['fromPhone']}}%
}
\setkomavar{fromemail}{%
  {{$data['fromEmail']}}%
}
\setkomavar{place}{%
  {{$data['fromPlace']}}%
}

\setkomavar{subject}{%
  {{$data['subject']}}%
}

\begin{document}
\begin{letter}{%
{{$data['toName']}}\\
{{$data['toStreet']}}\\
{{$data['toCity']}}, {{$data['toState']}} {{$data['toZip']}}%
}
\opening{%
  {{ $data['opening'] }}%
}
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

\closing{%
  {{ $data['closing'] }}%
}
\end{letter}
\end{document}
