function hcIVFDueHesapla() {
    const transferVal = document.getElementById('hc-ivf-date').value;
    const type = parseInt(document.getElementById('hc-ivf-type').value);

    if (!transferVal) {
        alert('Lütfen transfer tarihini seçin.');
        return;
    }

    const transferDate = new Date(transferVal);
    const today = new Date();

    // Standard human gestation from conception = 266 days
    // IVF: EDD = Transfer + 266 - Embryo Age
    const edd = new Date(transferDate.getTime() + ((266 - type) * 24 * 60 * 60 * 1000));
    
    // GA (Gestational Age) starts 14 days before conception
    // IVF GA = Today - (Transfer - 14 - type)
    const conceptionDate = new Date(transferDate.getTime() - (type * 24 * 60 * 60 * 1000));
    const lmpDate = new Date(conceptionDate.getTime() - (14 * 24 * 60 * 60 * 1000));
    
    const diffDays = Math.floor((today - lmpDate) / (24 * 60 * 60 * 1000));
    const weeks = Math.floor(diffDays / 7);
    const days = diffDays % 7;

    document.getElementById('hc-ivf-value').innerText = edd.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-ivf-week').innerText = weeks + " Hafta " + days + " Gün";

    document.getElementById('hc-ivf-due-result').classList.add('visible');
}
