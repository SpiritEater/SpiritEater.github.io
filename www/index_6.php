<?session_start ();

  require ('page_6.inc');

    $homepage = new Page();

  $homepage -> SetContent('<p> ������������ ������ �� ����: ������ � �������� � ��� </p>');

  $homepage -> SetTitle('������������ ������ �� ����: ������ � �������� � ���');

  $homepage -> Setnazvanie('������������ ������ �� ����� "���-����������������" <br> �������� ������ ��c-141: �������� ������� ����������� <br> ��������: �.�.�. ���. ������� �.�.');

  $homepage -> Display();

?>




