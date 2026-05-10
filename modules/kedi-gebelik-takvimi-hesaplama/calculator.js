function hcKediGebelikHesapla() {
    const matingDateInput = document.getElementById('hc-kgt-date').value;
    if (!matingDateInput) {
        alert('Lütfen çiftleşme tarihini seçiniz.');
        return;
    }

    const matingDate = new Date(matingDateInput);
    // Kedilerde ortalama gebelik süresi 63-65 gündür (biz 64 gün kullanacağız)
    const dueDate = new Date(matingDate);
    dueDate.setDate(matingDate.getDate() + 64);

    const resDate = document.getElementById('hc-kgt-res-date');
    const resInfo = document.getElementById('hc-kgt-res-info');

    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    resDate.innerText = dueDate.toLocaleDateString('tr-TR', options);

    const today = new Date();
    const diffTime = today - matingDate;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays < 0) {
        resInfo.innerHTML = "Çiftleşme tarihi gelecek bir tarih olamaz.";
    } else if (diffDays > 65) {
        resInfo.innerHTML = "Gebelik süresi tamamlanmış görünüyor.";
    } else {
        resInfo.innerHTML = `Kediniz gebeliğinin yaklaşık <strong>${diffDays}.</strong> gününde.`;
    }

    document.getElementById('hc-kedi-gebelik-result').classList.add('visible');
}
