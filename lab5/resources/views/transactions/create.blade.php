<h1>
    Create Transaction
</h1>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <div>
        <label for="name_surname_employee">
            Employee Name And Surname
        </label>
        <input type="text" id="name_surname_employee" name="name_surname_employee" required>
    </div>
    <div>
        <label for="name_surname_sender">
            Sender Name And Surname
        </label>
        <input type="text" id="name_surname_sender" name="name_surname_sender" required>
    </div>
    <div>
        <label for="account_number_sender">
            Sender Account Number
        </label>
        <input type="text" id="account_number_sender" name="account_number_sender" required>
    </div>
    <div>
        <label for="name_surname_receiver">
            Receiver Name And Surname
        </label>
        <input type="text" id="name_surname_receiver" name="name_surname_receiver" required>
    </div>
    <div>
        <label for="account_number_receiver">
            Receiver Account Number
        </label>
        <input type="text" id="account_number_receiver" name="account_number_receiver" required>
    </div>
    <div>
        <label for="amount">
            Amount
        </label>
        <input type="number" id="amount" name="amount" required>
    </div>

    <button type="submit">Create Transaction</button>
</form>
