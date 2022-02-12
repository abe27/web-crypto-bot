import { Guest } from '@/Layouts'
import { Header } from '@/Components'

const VerifyAccount = () => {
  return (
    <Guest>
      <Header
        title="รอยืนยันบันญชีผู้ใช้งาน"
        description="ขอ อ ภัยคุณยังไม่ได้ยืนยันบัญชีผู้ใช้งาน"
      />
    </Guest>
  )
}

export default VerifyAccount
