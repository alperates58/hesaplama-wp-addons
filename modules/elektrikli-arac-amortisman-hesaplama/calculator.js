function hcEaaHesapla() {
    const diff = parseFloat(document.getElementById('hc-eaa-diff').value);
    const saving = parseFloat(document.getElementById('hc-eaa-monthly-saving').value);

    if (isNaN(diff) || isNaN(saving) || saving <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const months = diff / saving;
    const years = Math.floor(months / 12);
    const remainingMonths = Math.ceil(months % 12);

    let result = "";
    if (years > 0) result += years + " Yıl ";
    result += remainingMonths + " Ay";

    document.getElementById('hc-eaa-val').innerText = result;
    document.getElementById('hc-eaa-result').classList.add('visible');
}
