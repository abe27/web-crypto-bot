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
import { ButtonIconReload, Pagination } from '@/Components'
import { ArrowLeftIcon, ArrowRightIcon } from '@chakra-ui/icons'

const capitalize = (s) => s[0].toUpperCase() + s.slice(1).toLowerCase()

const classNames = (...classes) => classes.filter(Boolean).join(' ')

const ShowBtnPaginations = (i, x) => {
  if (i.url) {
    if (i.label === 'Next &raquo;') {
      return (
        <button key={x} className="btn btn-sm">
          <ArrowRightIcon />
        </button>
      )
    }

    if (i.label === '&laquo; Previous') {
      return (
        <button key={x} className="btn btn-sm">
          <ArrowLeftIcon />
        </button>
      )
    }
    return (
      <button
        key={x}
        className={classNames(i.active ? 'btn-disabled' : '', 'btn btn-sm')}
      >
        {i.label}
      </button>
    )
  }

  return
}

const TableView = ({ interesting, clickNextPage = false }) => {
  console.dir(interesting)
  const handleClick = (e) => console.dir(e)
  return (
    <>
      {interesting.data && (
        <Table size="sm">
          <Thead>
            <Tr>
              <Th>ลำดับ</Th>
              <Th>ประเภท</Th>
              <Th>สถาบันแลกเปลี่ยน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>ราคาปัจจุบัน</Th>
              <Th isNumeric>อัตราการเปลี่ยนแปลง</Th>
              <Th>อัพเดทล่าสุดเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Thead>
          <Tbody>
            {interesting.data.map((i, x) => (
              <Tr key={i.id}>
                <Td>{x + 1}</Td>
                <Td>Crypto</Td>
                <Td>
                  <Flex>
                    <Center>
                      <Avatar size="xs" src={i.exchange_id.image_url} />
                    </Center>
                    <Square ml="2">
                      <Text size="md" fontWeight="bold">
                        {capitalize(i.exchange_id.name)}
                      </Text>
                    </Square>
                  </Flex>
                </Td>
                <Td>
                  <Flex>
                    <Center>
                      <AvatarGroup size="xs" max={2}>
                        <Avatar
                          name={i.asset_id.symbol}
                          src={`/storage/crypto/${i.asset_id.symbol.toLowerCase()}.png`}
                        />
                        <Avatar
                          size="xs"
                          name={i.currency_id.currency}
                          src={i.currency_id.flag_url}
                        />
                      </AvatarGroup>
                    </Center>
                    <Square ml="2">
                      <Text size="md" fontWeight="bold">
                        {i.asset_id.symbol}/{i.currency_id.currency}
                      </Text>
                    </Square>
                  </Flex>
                </Td>
                <Td isNumeric>{i.last_price.toLocaleString()}</Td>
                <Td isNumeric>{i.last_percent.toLocaleString()}%</Td>
                <Td>{i.updated_at}</Td>
                <Td>
                  <ButtonIconReload handleClick={handleClick} />
                </Td>
              </Tr>
            ))}
          </Tbody>
          <Tfoot>
            <Tr>
              <Th>ลำดับ</Th>
              <Th>ประเภท</Th>
              <Th>สถาบันแลกเปลี่ยน</Th>
              <Th>สินทรัพย์</Th>
              <Th isNumeric>ราคาปัจจุบัน</Th>
              <Th isNumeric>อัตราการเปลี่ยนแปลง</Th>
              <Th>อัพเดทล่าสุดเมื่อ</Th>
              <Th></Th>
            </Tr>
          </Tfoot>
        </Table>
      )}

      {interesting.meta.last_page != interesting.meta.current_page && (
        <div className="flex max-w-7xl mx-auto p-6 justify-center">
          <div className="btn-group">
            {interesting.meta.links && (
              <Pagination
                data={interesting.meta.links}
                handleClick={clickNextPage}
              />
            )}
          </div>
        </div>
      )}
    </>
  )
}

export default TableView
