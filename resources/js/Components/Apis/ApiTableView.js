import React, { useState } from 'react'
import {
  Avatar,
  IconButton,
  Link,
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
  useToast,
} from '@chakra-ui/react'
import { AlertDialogComfirm, ButtonIconHandles } from '@/Components'
import { AlertDialogForm } from '@/Components/Apis'
import { AddIcon, DeleteIcon } from '@chakra-ui/icons'
import { useForm } from '@inertiajs/inertia-react'

const ApiTableView = ({ apiData, onRefresh }) => {
  const { processing, delete: destroy } = useForm()
  const [isOpen, setIsOpen] = useState(false)
  const [isInsert, setIsInsert] = useState(false)
  const [id, setId] = useState(null)

  const toast = useToast()

  const handleClick = (obj) => {
    setId(obj.id)
    setIsOpen(true)
  }

  const onClose = (e) => {
    if (e.target.name == 'confirm') {
      /* delete obj */
      console.dir(`del => ${id}`)
      destroy(route('api-data.delete', id), {
        preserveScroll: true,
        resetOnSuccess: false,
        onSuccess: () => {
          onRefresh(id)
          toast({
            title: `ลบข้อมูล ${id} เรียบร้อยแล้ว`,
            position: 'top-right',
            status: 'success',
            isClosable: true,
          })
        },
      })
    }
    setIsOpen(false)
  }

  const insertOnClose = (status) => {
    setIsInsert(false)
    if (status) onRefresh(true)
  }

  const diffDate = (n) => {
    const d = new Date(n) - new Date()
    let t = (
      <Text fontSize="sm" color="green">
        -
      </Text>
    )
    if (d < 0) {
      t = (
        <Text fontSize="sm" color="tomato">
          หมดอายุ
        </Text>
      )
    }
    return t
  }

  return (
    <>
      <AlertDialogComfirm
        title="ยืนยันคำสั่ง"
        description="คุณต้องการที่จะลบรายการนี้ใช่หรือไม่"
        isOpen={isOpen}
        onClose={onClose}
      />
      <AlertDialogForm isOpen={isInsert} isClosed={insertOnClose} />
      <Table size="sm">
        <Thead>
          <Tr>
            <Th>ลำดับที่</Th>
            <Th>ตลาด</Th>
            <Th>สถาบัน</Th>
            <Th>คีย์</Th>
            <Th>วันที่หมดอายุ</Th>
            <Th>สถานะ</Th>
            <Th>
              <IconButton
                size="sm"
                variant="ghost"
                isRound
                aria-label="เพิ่มรายการ API Key ใหม่"
                icon={<AddIcon />}
                onClick={() => setIsInsert(true)}
              />
            </Th>
          </Tr>
        </Thead>
        <Tbody>
          {apiData &&
            apiData.map((i, x) => (
              <Tr key={i.api_key}>
                <Td>{x + 1}</Td>
                <Td>{i.get_exchange.get_exchange_group.title}</Td>
                <Td>
                  <Flex>
                    <Center>
                      <Avatar size="xs" src={i.get_exchange.image_url} />
                    </Center>
                    <Square ml="2">
                      <Text size="md" fontWeight="bold">
                        {i.get_exchange.name}
                      </Text>
                    </Square>
                  </Flex>
                </Td>
                <Td>
                  {i.api_key.slice(0, 3)}***************
                  {i.api_key.slice(i.api_key.length - 3)}
                </Td>
                <Td>{i.expire_date}</Td>
                <Td>{diffDate(i.expire_date)}</Td>
                <Td>
                  <ButtonIconHandles
                    reload={processing}
                    handleClick={() => handleClick(i)}
                    icon={<DeleteIcon />}
                    colorScheme="red"
                  />
                </Td>
              </Tr>
            ))}
        </Tbody>
        <Tfoot>
          <Tr>
            <Th>ลำดับที่</Th>
            <Th>ตลาด</Th>
            <Th>สถาบัน</Th>
            <Th>คีย์</Th>
            <Th>วันที่หมดอายุ</Th>
            <Th></Th>
          </Tr>
        </Tfoot>
      </Table>
    </>
  )
}

export default ApiTableView
