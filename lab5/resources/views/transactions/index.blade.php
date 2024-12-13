<div>
    <h1>Transactions</h1>
    <a href="{{ route('transactions.create') }}">
        Create Transactions
    </a>
    @if($transactions->isEmpty())
        <p>
            No transactions found
        </p>
    @else
        <table>
            <thead>
            <tr>
                <td>Employee name</td>
                <td>Sender name</td>
                <td>Sender account number</td>
                <td>Receiver name</td>
                <td>Receiver account number</td>
                <td>Amount</td>
                <td>Created at</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->name_surname_employee }}</td>
                    <td>{{ $transaction->name_surname_sender }}</td>
                    <td>{{ $transaction->account_number_sender }}</td>
                    <td>{{ $transaction->name_surname_receiver }}</td>
                    <td>{{ $transaction->account_number_receiver }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        <a href="{{ route("transactions.edit", $transaction->id) }}">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
