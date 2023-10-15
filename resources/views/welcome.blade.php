<!DOCTYPE html>
<html>
<head>
    <title>Список заявок</title>
</head>
<body>
<h1>Список заявок</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Дилер</th>
        <th>Сумма кредита</th>
        <th>Срок кредита</th>
        <th>Статус</th>
    </tr>
    @foreach($applications as $application)
        <tr>
            <td>{{ $application->id }}</td>
            <td>{{ $application->dealer->name }}</td>
            <td>{{ $application->loan_amount }}</td>
            <td>{{ $application->loan_term }}</td>
            <td>{{ $application->status->name }}</td>

        </tr>
    @endforeach
</table>

{{ $applications->links() }}
</body>
</html>
