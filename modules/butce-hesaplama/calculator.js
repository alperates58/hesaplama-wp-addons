function hcButceHesapla() {
    const salary = parseFloat(document.getElementById('hc-bu-salary').value) || 0;
    const extra = parseFloat(document.getElementById('hc-bu-extra').value) || 0;
    
    const rent = parseFloat(document.getElementById('hc-bu-rent').value) || 0;
    const bills = parseFloat(document.getElementById('hc-bu-bills').value) || 0;
    const food = parseFloat(document.getElementById('hc-bu-food').value) || 0;
    const transport = parseFloat(document.getElementById('hc-bu-transport').value) || 0;
    const other = parseFloat(document.getElementById('hc-bu-other').value) || 0;

    const totalIncome = salary + extra;
    const totalExpense = rent + bills + food + transport + other;
    const balance = totalIncome - totalExpense;

    document.getElementById('hc-bu-res-income').innerText = totalIncome.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-bu-res-expense').innerText = totalExpense.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-bu-res-balance').innerText = balance.toLocaleString('tr-TR') + ' ₺';

    const balanceEl = document.getElementById('hc-bu-res-balance');
    balanceEl.style.color = balance >= 0 ? "#27ae60" : "#c0392b";

    document.getElementById('hc-budget-result').classList.add('visible');
}
