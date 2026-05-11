function hcKonutKredisiOdemePlaniHesapla() {
    const amount = parseFloat(document.getElementById('hc-kkop-amount').value);
    const monthlyRate = parseFloat(document.getElementById('hc-kkop-rate').value) / 100;
    const term = parseInt(document.getElementById('hc-kkop-term').value);

    if (!amount || !monthlyRate || !term) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Taksit = [P * i * (1+i)^n] / [(1+i)^n - 1]
    const installment = (amount * monthlyRate * Math.pow(1 + monthlyRate, term)) / (Math.pow(1 + monthlyRate, term) - 1);
    const totalPayment = installment * term;
    const totalInterest = totalPayment - amount;

    document.getElementById('hc-kkop-monthly').innerText = installment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkop-total').innerText = totalPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkop-total-interest').innerText = totalInterest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    const tbody = document.querySelector('#hc-kkop-table tbody');
    tbody.innerHTML = '';

    let remainingBalance = amount;
    for (let i = 1; i <= term; i++) {
        const interestPayment = remainingBalance * monthlyRate;
        const principalPayment = installment - interestPayment;
        remainingBalance -= principalPayment;

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${i}</td>
            <td>${installment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} ₺</td>
            <td>${principalPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} ₺</td>
            <td>${interestPayment.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} ₺</td>
            <td>${Math.max(0, remainingBalance).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} ₺</td>
        `;
        tbody.appendChild(row);
    }

    document.getElementById('hc-kkop-result').classList.add('visible');
}
