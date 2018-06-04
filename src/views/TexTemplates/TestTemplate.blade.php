\documentclass[{{ implode(",",$data['classOptions']) }}]{article}

\begin{document}
Hello World

@foreach ($data['items'] as $item)
  {{ $item }}\\
@endforeach
\end{document}
