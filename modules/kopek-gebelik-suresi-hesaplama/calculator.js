function hcKopekGebelikHesapla() {
    const matingDateInput = document.getElementById('hc-kgs-date').value;
    if (!matingDateInput) {
        alert('Lütfen çiftleşme tarihini seçiniz.');
        return;
    }

    const matingDate = new Date(matingDateInput);
    // Köpeklerde ortalama gebelik süresi 63 gündür
    const dueDate = new Date(matingDate);
    dueDate.setDate(matingDate.getDate() + 63);

    const resDate = document.getElementById('hc-kgs-res-date');
    const resInfo = document.getElementById('hc-kgs-res-info');

    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    resDate.innerText = dueDate.toLocaleDateString('tr-TR', options);

    const today = new Date();
    const diffTime = today - matingDate;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays < 0) {
        resInfo.innerHTML = "Çiftleşme tarihi gelecek bir tarih olamaz.";
    } else if (diffDays > 63) {
        resInfo.innerHTML = "Gebelik süresi tamamlanmış görünüyor.";
    } else {
        resInfo.innerHTML = `Köpeğiniz gebeliğinin yaklaşık <strong>${diffDays}.</strong> gününde.`;
    }

    document.getElementById('hc-kopek-gebelik-result').classList.add('visible');
}
