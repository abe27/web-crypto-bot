import React, { useState } from 'react'
import {
  Avatar,
  AvatarGroup,
  Table,
  Thead,
  Tbody,
  Tfoot,
  Tr,
  Th,
  Td,
  Flex,
  Text,
  Center,
  Square,
} from '@chakra-ui/react'
import { AlertDialogComfirm, ButtonIconHandles } from '@/Components'
import { DeleteIcon } from '@chakra-ui/icons'

const FollowUpTableView = ({ obj, }) => {
  const [isOpen, setIsOpen] = useState(false)
  const [isConfirm, setIsConfirm] = useState(false)

  const handleClick = (e) => {
    console.dir(e.target)
    setIsOpen(true)
  }

  const handleOnClose = (e) => {
    if (e != undefined) {
      console.log(`confirm delete is ${e.target.name}`)
      setIsOpen(false)
    }
  }

  return (
    <>
      <AlertDialogComfirm
        isOpen={isOpen}
        onClose={handleOnClose}
        is_confirm={() => setIsConfirm}
        title="ยืนยันคำสั่งปิดออร์เดอร์"
        description="คุณต้องการที่จะปิดออร์เดอร์นี้ใช่หรือไม่?"
      />
      {obj && (
        <Table size="sm">
          <Thead>
            <Tr>
              <Th>เลขที่</Th>
              <Th>ตลาด</Th>
              <Th>สถาบัน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>เปิด</Th>
              <Th isNumeric>ปัจจุบัน</Th>
              <Th isNumeric>การเปลี่ยนแปลง</Th>
              <Th isNumeric>กำไรสุทธิ์</Th>
              <Th>แก้ไขเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Thead>
          <Tbody>
            <Tr>
              <Td>ORDERNO0023231</Td>
              <Td>Crypto</Td>
              <Td>
                <Flex>
                  <Center>
                    <Avatar
                      size="xs"
                      src="https://www.iconpacks.net/icons/2/free-icon-binance-coin-2211.png"
                    />
                  </Center>
                  <Square ml="2">
                    <Text size="md" fontWeight="bold">
                      Binance
                    </Text>
                  </Square>
                </Flex>
              </Td>
              <Td>
                <Flex>
                  <Center>
                    <AvatarGroup size="xs" max={2}>
                      <Avatar
                        name="BNB"
                        src="https://www.iconpacks.net/icons/2/free-icon-binance-coin-2211.png"
                      />
                      <Avatar
                        size="xs"
                        name="USDT"
                        src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/1024/Tether-USDT-icon.png"
                      />
                    </AvatarGroup>
                  </Center>
                  <Square ml="2">
                    <Text size="md" fontWeight="bold">
                      BNB/USDT
                    </Text>
                  </Square>
                </Flex>
              </Td>
              <Td isNumeric>5.4</Td>
              <Td isNumeric>25.4</Td>
              <Td isNumeric>200.0%</Td>
              <Td isNumeric>20.00</Td>
              <Td>2022-01-01 11:11:00</Td>
              <Td>
                <ButtonIconHandles
                  handleClick={handleClick}
                  icon={<DeleteIcon />}
                  colorScheme="red"
                />
              </Td>
            </Tr>
          </Tbody>
          <Tfoot>
            <Tr>
              <Th>รวม(16)</Th>
              <Th>ตลาด</Th>
              <Th>สถาบัน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>เปิด</Th>
              <Th isNumeric>ปัจจุบัน</Th>
              <Th isNumeric>การเปลี่ยนแปลง</Th>
              <Th isNumeric>กำไรสุทธิ์</Th>
              <Th>แก้ไขเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Tfoot>
        </Table>
      )}
    </>
  )
}

export default FollowUpTableView
